<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use Auth;
use SleepingOwl\Admin\Form\FormElements;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use App\Models\Weather;
/**
 * Class Countries
 *
 * @property \App\Model\Country $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Weather extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Weather';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
       $this->addToNavigation()->setPriority(102)->setIcon('fa fa-globe');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        
      return AdminDisplay::datatablesAsync()->setDisplaySearch(true)/*->with('users')*/

            ->setHtmlAttribute('class', 'table-primary')
            ->setApply(function($query) {
            if(Auth::user()->isSuperAdmin()){
            $query->orderBy('date', 'desc');
            }
            else{
                $query->where('City', Auth::user()->company)->orderBy('date', 'desc');
            }
            

        })
            ->setColumns(
                AdminColumn::text('date', 'Date'),
                AdminColumn::text('temperature', 'Temperature')
            )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('city', 'City')->required(),
            AdminFormElement::number('temperature', 'Temperature')->required(),
            AdminFormElement::text('date')->setLabel('Date')->setReadonly(1)
        ]);

    }

    /**
     * @return FormInterface
     */
   public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function onUpdate()
    {
        return $this->onEdit(null);
    }
     public function onDelete($id)
    {
        // todo: remove if unused
    }
    
    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}

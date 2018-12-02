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
use App\Models\Discount_List;
/**
 * Class Countries
 *
 * @property \App\Model\Country $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Discount_Lists extends Section implements Initializable
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
    protected $title = 'Дисконтная система';

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
            $query->orderBy('id', 'desc');
            }else{
                $query->where('company', Auth::user()->company)->orderBy('id', 'desc');
            }
            

        })
            ->setColumns(
                AdminColumn::text('id', 'ID'),
                AdminColumn::link('name', 'Name'),
                AdminColumn::link('number', 'Discount %'),
                AdminColumn::text('min_amount', 'Min amount')
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
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::hidden('company')->setDefaultValue(Auth::user()->company),
            AdminFormElement::number('number', 'Discount %')->required(),
            AdminFormElement::number('min_amount', 'Min amount')->required(),
            AdminFormElement::number('max_amount', 'Max amount')->required()
        ]);

    }

    /**
     * @return FormInterface
     */
   public function onCreate()
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

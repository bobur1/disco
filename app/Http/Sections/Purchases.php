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
use App\Models\Purchase;
/**
 * Class Countries
 *
 * @property \App\Model\Country $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Purchases extends Section implements Initializable
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
    protected $title = 'Покупки';

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
            }
            else{
                $query->where('company', Auth::user()->company)->orderBy('id', 'desc');
            }
            

        })
            ->setColumns(
                AdminColumn::text('id', 'ID'),
                AdminColumn::link('user_ID', 'User ID'),
                AdminColumn::text('product_name', 'Product Name'),
                AdminColumn::text('company', 'Company Name'),
                AdminColumn::text('created_at', 'Date')

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
            AdminFormElement::number('user_ID', 'User ID')->required(),

            AdminFormElement::text('product_category', 'Product category')->required(),
            AdminFormElement::text('product_name', 'Product name')->required(),
            AdminFormElement::text('company', 'Company')->required(),
            AdminFormElement::number('filial', 'Filial')->required(),
            AdminFormElement::number('check_number', 'Check number')->required(),
            AdminFormElement::number('quantity', 'Quantity')->required(),
            AdminFormElement::number('weight', 'Weight (in gm)'),
            AdminFormElement::number('volume', 'Volume'),

            
            AdminFormElement::text('updated_at')->setLabel('Created at')->setReadonly(1),

            AdminFormElement::text('created_at')->setLabel('Updated at')->setReadonly(1)

            

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

<?php namespace ERegnier\EventGallery;

use System\Classes\PluginBase;
use Event;
use HendrikErz\Campaignr\Models\Event as EventModel;
use HendrikErz\Campaignr\Controllers\Events as EventsController;



class Plugin extends PluginBase
{
    public $require = ['HendrikErz.Campaignr'];

    public function boot()
    {
        // Extend all backend form usage
        EventModel::extend(function($model)
        {
            $model->addJsonable([
                'gallery'
            ]);
        });

        EventsController::extendFormFields(function($form, $model, $context)
        {
            if (!$model instanceof EventModel || $form->isNested) {
                return;
            }

            // Add an extra birthday field
            $form->addSecondaryTabFields([
                'gallery' => [
                    'label'   => 'Gallery',
                    'comment' => 'Select images',
                    'type'    => 'repeater',
                    'tab'       => 'hendrikerz.campaignr::lang.fields.tab_details',
                    'form'  => [
                    'fields' => ['slide' => [
                    'label'   => 'Image',
                    'type'    => 'mediafinder',
                    'mode'  => 'image'
                ]]]
                ]
            ]);

        });
    }
}
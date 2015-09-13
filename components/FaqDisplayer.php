<?php namespace LaminSanneh\FantasticFaq\Components;

use Cms\Classes\ComponentBase;
use LaminSanneh\FantasticFaq\Models\FaqGroup;

class FaqDisplayer extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'laminsanneh.fantasticfaq::lang.strings.component_name',
            'description' => 'laminsanneh.fantasticfaq::lang.strings.component_desc'
        ];
    }

    public function defineProperties()
    {
        return [
            'faqGroup' => [
                'title'       => 'laminsanneh.fantasticfaq::lang.strings.faqgroup_title',
                'description' => 'laminsanneh.fantasticfaq::lang.strings.faqgroup_desc',
                'type'        => 'dropdown',
                'default'     => ''
            ],
            'injectBootstrapAssets' => [
                'title'       => 'laminsanneh.fantasticfaq::lang.strings.inject_bootstrap_title',
                'description' => 'laminsanneh.fantasticfaq::lang.strings.inject_bootstrap_desc',
                'type'        => 'checkbox',
                'default'     => true,
            ]
        ];
    }

    public function getfaqGroupOptions(){
        return FaqGroup::lists('name', 'id');
    }

    public function selectedFaqGroup(){
        $selectedFaqGroupId = $this->property('faqGroup');

        return FaqGroup::with('questions')->find($selectedFaqGroupId);

    }

    public function onRun()
    {
        if($this->property('injectBootstrapAssets') == true){
            $this->addCss('assets/css/bootstrap.css');
            $this->addJs('assets/js/bootstrap.js');
        }
    }
}
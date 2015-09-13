<?php namespace LaminSanneh\FantasticFaq;

use Backend\Facades\Backend;
use System\Classes\PluginBase;

/**
 * FantasticFaq Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'FantasticFaq',
            'description' => 'laminsanneh.fantasticfaq::lang.strings.plugin_desc',
            'author'      => 'LaminSanneh',
            'icon'        => 'icon-leaf',
        ];
    }

    public function registerComponents()
    {
        return [
            '\LaminSanneh\FantasticFaq\Components\FaqDisplayer' => 'faqDisplayer',
        ];
    }

    /* register permissions */

    public function registerPermissions()
    {
        return [
            'laminsanneh.fantasticfaq.access_faqgroups' => [
                'tab'   => 'laminsanneh.fantasticfaq::lang.permissions.tab',
                'label' => 'laminsanneh.fantasticfaq::lang.permissions.manage_faqs',
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'fantasticfaq' => [
                'label'       => 'laminsanneh.fantasticfaq::lang.strings.faq_groups',
                'url'         => Backend::url('laminsanneh/fantasticfaq/faqgroups'),
                'icon'        => 'icon-bullhorn',
                'permissions' => ['laminsanneh.fantasticfaq.*'],
                'order'       => 500,
                'sideMenu'    => [
                    'faqgroups' => [
                        'label'       => 'laminsanneh.fantasticfaq::lang.strings.all_form_groups',
                        'url'         => Backend::url('laminsanneh/fantasticfaq/faqgroups'),
                        'icon'        => 'icon-pencil',
                        'permissions' => ['laminsanneh.fantasticfaq.access_faqgroups'],
                    ],
                ],

            ],
        ];
    }

}

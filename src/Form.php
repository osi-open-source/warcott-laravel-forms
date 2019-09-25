<?php

namespace Warcott;

use Illuminate\Contracts\View\Factory as View;
use Illuminate\Support\HtmlString;

class Form
{

    /**
     * @var Client
     */
    private $warcottClient;
    /**
     * @var View
     */
    private $view;

    /**
     * Form constructor.
     * @param Client $warcottClient
     * @param View $viewFactory
     */
    public function __construct(Client $warcottClient, View $viewFactory)
    {
        $this->warcottClient = $warcottClient;
        $this->view = $viewFactory;
    }

    /**
     * @param array $domainKeys
     * @param null|string $action
     * @param null|string $submitText
     * @return HtmlString
     */
    public function display(array $domainKeys = [], ?string $action = null, ?string $submitText = null): string
    {
        try {
            $dataset = $this->warcottClient->getDataset($domainKeys);
        } catch (\Exception $e) {
            return new HtmlString($this->view->make('warcott::error_loading')->with('error', $e)->render());
        }
        return new HtmlString(
            $this->view->make('warcott::form')
                ->with('dataset', $dataset)
                ->with('keys', $domainKeys)
                ->with('action', $action)
                ->with('submitText', $submitText)
                ->render()
        );
    }

}

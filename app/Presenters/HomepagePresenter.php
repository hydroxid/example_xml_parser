<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Model\Parser;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /**
    * @inject
    * @var Parser */
    public $parser;

    /**
    * index
    *
    * @return void
    * @author hydroxid 
    */
    public function renderDefault() : void
    {
        /**
        * parse xml
        */
        $this->template->rows = $this->parser->load();
    }
}

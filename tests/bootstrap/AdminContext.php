<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Driver\Selenium2Driver;
use Laracasts\Behat\Context\Migrator;
use Laracasts\Behat\Context\DatabaseTransactions;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class AdminContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use Migrator, DatabaseTransactions;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @Given category name :arg1 id :arg2 exists
     */
    public function categoryNameIdExists($arg1, $arg2)
    {
        factory(App\Category::class)->create([
            'id' => $arg2,
            'name' => $arg1,
        ]);
    }

    /**
     * @Then I click :arg1 element
     */
    public function iClickElement($selector)
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', $selector);

        if (empty($element))
            throw new Exception("No html element found for the selector ('$selector')");

        $element->click();
    }

    /**
     * @Then I type in :arg1 element with :arg2
     */
    public function iTypeInElementWith($selector, $value)
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', $selector);

        if (empty($element))
            throw new Exception("No html element found for the selector ('$selector')");

        $element->setValue($value);
    }

    /**
     * @Given the following categories exist:
     */
    public function theFollowingCategoriesExist(TableNode $table)
    {
        $hash = $table->getHash();
        foreach ($hash as $row) {
            factory(App\Category::class)->create([
                'name' => $row['name'],
            ]);
        }
    }
}

<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
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
     * @Given an admin has signed in
     */
    public function anAdminHasSignedIn()
    {
        $user = factory(App\User::class)->create([
            'email' => 'admin@decoks.dev',
            'password' => bcrypt('admin@decoks.dev')
        ]);

        \Auth::login($user);
    }


    /**
     * @Given the following :arg1 model exists:
     */
    public function theFollowingModelExists($model, TableNode $table)
    {
        $model = "App\\".ucfirst($model);
        $rows = $table->getHash();

        foreach($rows as $row) {
            $instance = new $model($row);
            $instance->save();
        }
    }

    /**
     * @When I delete a :arg1 model of id :arg2
     */
    public function iDeleteAModelOfId($model, $id)
    {
        route("admin.$model.destroy", ['id' => $id]);
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
}

<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Driver\Selenium2Driver;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class AdminContext extends MinkContext implements Context, SnippetAcceptingContext
{


    /**
     * Migrate the database before each scenario and refresh
     *
     * @beforeScenario
     */
    public function migrateRefresh()
    {
        Artisan::call('migrate:refresh');
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

        if ($this->getSession()->getDriver() instanceof \Behat\Mink\Driver\Selenium2Driver) {

            $this->visit(route('login'));
            $this->fillField('email', 'admin@decoks.dev');
            $this->fillField('password', 'admin@decoks.dev');
            $this->pressButton('Sign In');
        }
    }

    /**
     * @Given the following :arg1 model exists:
     */
    public function theFollowingProductExist($model = 'product', TableNode $table)
    {
        $model = "App\\".ucfirst($model);
        $rows = $table->getHash();

        foreach($rows as $row) {
            $instance = new $model($row);

            $row = collect($row);


            $relation = $row->filter(function($value, $key) use($instance) {
                if(strpos($key, '_id') == true) {
                    $relationName = explode('_', $key)[0];
                    $instance->$relationName()->associate($value);
                }
            });

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

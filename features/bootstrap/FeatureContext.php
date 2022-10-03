<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
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

    public function before($event)
    {
        $this->visitPath('/');
        $this->getSession()->maximizeWindow();
        $this->getSession()->resizeWindow(1500, 500);
    }

    /**
     * @Then I follow :arg1 link
     */
    public function iFollowLink($arg1)
    {
        //throw new PendingException();
    }

    /**
     * @Then this is test
     * @Then esto es prueba
     */
    public function thisIsTest()
    {
        // throw new PendingException();
    }

    /**
     * @Then click on :arg1
     */
    public function clickOn($arg1)
    {

        $arg1 = $this->fixStepArgument($arg1);
        $this->getSession()->getPage()->clickLink($arg1);
    }

    /**
     * @Then wait for :arg1 seconds
     */
    public function waitForSeconds($arg1)
    {

        sleep(seconds: $arg1);
    }

    /**
     * @Then /^I should see "([^"]*)" title$/
     */
    public function iShouldSeeHeading($text)
    {
        echo $this->getSession()->getCurrentUrl();
        $this->assertSession()->responseContains($this->fixStepArgument($text));
        //pageTextContains($this->fixStepArgument($arg1));
        sleep(seconds: 5);
    }

    /**
     * @When /^I enter following details$/
     */
    public function iEnterFollowingDetails(TableNode $table)
    {
        $page = $this->getSession()->getPage();

        foreach ($table as $row) {
            var_dump($row);

            $name = $row['Your name'];
            $email = $row['Your email address'];
            $subject = $row['Subject'];

            $page->find('css', 'input#edit-name')->setValue($name);
            $page->find('xpath', "//input[@id='edit-mail']")->setValue($email);
            $page->find('css', 'input#edit-subject-0-value')->setValue($subject);
        }
    }

    /**
     * @Then /^scroll and click on "([^"]*)"$/
     */
    public function scrollAndClickOn($name)
    {
        $page = $this->getSession()->getPage();
        $page->find('css', "a[class='menu-footer__link']")->click();
        #$page->find('css', "a.menu-footer__link")->click();
    }


    /**
     * @Given /^click on x button$/
     */
    public function clickOnXButton()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', "button[class='close']")->click();
    }

    /**
     * @When /^I fill in email address with "([^"]*)"$/
     */
    public function iFillInEmailAddressWith($email)
    {
        $page = $this->getSession()->getPage();
        $page->find('xpath', "//input[@id='mce-EMAIL']")->setValue($email);
    }

    /**
     * @Given /^I click on subscribe button$/
     */
    public function iClickOnSubscribeButton()
    {
        $page = $this->getSession()->getPage();
        $this->scrollAndClick("button.btn-solid");
    }
    public function scrollAndClick($cssSelector)
    {
        $function = <<<JS
        (
            function()
            {
                document.querySelector("$cssSelector").scrollIntoView();
            }, function()
            {
                document.querySelector("$cssSelector").click();
            })() 
JS;
        try
        {
            $this->getSession()->executeScript($function);
        }
        catch (Exception $e)
        {
            throw new \Exception("Scroll Into View Failed. Check Your Script");
        }
    }

}


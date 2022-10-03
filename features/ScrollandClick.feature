#language: en
@scrollandclick
Feature:Verify scroll functionality

  Background:
    Given I am on homepage


  @scroll
  Scenario:
    When click on "Find out more"
    And wait for 2 seconds
    Then I follow "Alcohol free"
    And wait for 2 seconds
    Then click on "Home"
    And wait for 2 seconds
    Then scroll and click on "Contact"
    Then wait for 2 seconds
    Given I should see "Website feedback" title
    And wait for 2 seconds


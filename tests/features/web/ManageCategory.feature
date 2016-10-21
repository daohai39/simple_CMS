@manage-category
Feature: Manage Category
	In order to manage all categories
	As an admin
	I need to be able to create, read, update, delete every category

Background:
    Given an admin has signed in

Scenario: View a table of categories
    When I go to "/admin/category"
    Then I should see a "table" element
    And I should see "Name"
    And I should see "Actions"


Scenario: Create a category
    When I go to "/admin/category/create"
    And I fill in "name" with "Foo"
    And I press "Create"
    Then the "name" field should contain "Foo"

Scenario: Update a category
    Given the following "category" model exists:
    | id | name  |
    | 1  | Indoor|
    When I go to "/admin/category/1/edit"
    Then I fill in "name" with "Outdoor"
    And I press "Edit"
    Then I should be on "/admin/category/1/edit"
    And the "name" field should contain "Outdoor"

Scenario: Delete a category
    Given the following "category" model exists:
    | id | name  |
    | 1  | Indoor|
    And I am on "/admin/category"
    When I delete a "category" model of id "1"
    Then I should be on "/admin/category"





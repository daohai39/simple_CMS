@manage-product
Feature: Manage Product
	In order to manage all products
	As an admin
	I need to be able to create, read, update, delete every product

Background:
    Given an admin has signed in
    And the following "category" model exists:
    | id | name  |
    | 1  | Indoor|
    Given the following "product" model exists:
    | id | name    | code | category_id| author     |
    | 1  | Product |  1   |     1      | John Doe   |

Scenario: View a table of products
    When I go to "/admin/product"
    Then I should see a "table" element
    And I should see "Product"

@javascript
Scenario: Create a product
    When I go to "/admin/product/create"
    And I fill in "name" with "Foo"
    And I fill in "code" with "2"
    And I fill in "author" with "Bar"
    And I fill in select2 input "category_id" with "Indoor" and select "Indoor"
    And I press "Create"
    Then I should be on "/admin/product/2/edit"
    Then the "name" field should contain "Foo"

@javascript
Scenario: Update a product
    When I go to "/admin/product/1/edit"
    And I fill in "name" with "Product updated"
    And I press "Edit"
    Then I should be on "/admin/product/1/edit"
    And the "name" field should contain "Product updated"

Scenario: Delete a product
    And I am on "/admin/product"
    When I delete a "product" model of id "1"
    Then I should be on "/admin/product"



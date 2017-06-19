# Magento Exam project

Design and implement two Magento modules. Your project must meet all the requirements listed below.

## Requirements
* Use fresh installed Magento 1.9.x
* Use version control system
* Use GitHub or other source control system as project collaboration platform and commit your daily work

## Forbidden Techniques and Tools
* Using **Module Generation Tools** is forbidden.

## Project

### Required functionalities:
* Installed PHP 7 Patch via composer.
* Contest module with the following functionalities:
* The SoftUni namespace must be used for the module's name.

**Contestant entity:**
  * **Models + DB** tables with at least 12 fields, 11 of which must be:
    * contestant_id
    * contest_id
    * approved
    * firstname
    * lastname
    * dob
    * country 
    * city
    * message
    * created_at
    * updated_at
  * Grid in the administration by Magento's standards.
  * CRUD operations using Magento's form and standards.

**Contest entity:**
  * **Models + DB** tables with at least 6 fields, 5 of which must be:
    * contest_id
    * title
    * is_active
    * created_at
    * updated_at
  * **Grid in the administration** by Magento's standards.
  * **CRUD operations** using Magento's form and standards.
  * **Frontend page** (for the specific contest entity) with submission form for the contestants with the following required inputs: 
    * firstname
    * lastname
    * dob (date of birth)
    * country
    * city
    * message
    * Above the form the contest's title must be shown in h1 tag.
    * The submitted data must be saved as Contestant entity in the database with correct data for all fields with exception of the created_at and updated_at fields. The approved field must be 0 when contestant is created using the frontend form.
  * **Frontend page** (for the specific contest entity) which shows list with all of the approved contestants for given (by URL) contest entity. The following data must be shown for each of the contestants:
    * Firstname
    * The first letter of the Lastname
    * Country
    * City.
  * All of the frontend pages must be unavailable when the contest's data **is_active is set to No.**
  * **Widget** to be used in CMS pages to show the submission form for a given contest.
  * **Translate all texts**.
  
**Statistics module** with the following functionalities:
  * **The SoftUni namespace** must be used for the module's name.
  * **Frontend page:**
    * **Allowed only for logged in customers**.
    * **Customer navigation** in the left column.
    * **Link for the page** in the customer navigation menu.
    * **Block + template** in the content area to show information about:
      * **Number of all the orders** in Magento with state Completed,
      * **Number of all the orders** in Magento with state diferent tham Completed.
      * **Number of all active products** in Magento.
    * **Configuration in System > Configuration to Enble/Disable this page.**
    * **Translate all texts.**

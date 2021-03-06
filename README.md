# CSCI4300-Final-Project

GROUP MEMBERS
(lines of code and commits pulled from Github)

Andrew Taylor
 - Project lead
 - Front-end
 - 4,602 lines of code, 51 commits

Ryan Schuster
 - Database architect
 - Back-end
 - 1,704 lines of code, 38 commits
 - Additional unregistered lines of code for database work

Corbin Spence
 - Front-end
 - 259 lines of code, 12 commits

Andrew Li
 - Back-end
 - 131 lines of code, 4 commits

Running the program

Windows
 - Put parent folder (CSCI4300-Final-Project) in the htdocs folder of XAMPP
 - Run XAMPP, go to localhost (using Apache)
 - open PhpMyAdmin
 - In the sql folder of this project, there is the DB script which will create and populate the database. Run that script.
 - Open main.php 

Additional Files
 - The project uses JQuery. While the JQuery min should be included in the zip, if most pages are giving javascript errors when opened, JQuery may need to be downloaded.
    - IF JQuery needs to be downloaded, it MUST be placed in \CSCI4300-Final-Project\js\jquery\jquery-3.6.0.min.js, and be named jquery-3.6.0.min.js


Troubleshooting
 - Do not statically open main.php
    - For example, do not use the file explorer and navigate to C:/xampp/htdocs/project/main.php -- This will prevent xampp from actually running the page in a server.
    - DO use a browser, and type 'localhost/project_name/file_path'
 - Do not change the name of the project. This will break page navigation as it is based on relative paths to the parent directory name.

Misc
 - There is a delete function built into the tracker page. Right click any orange item, and you will have the option to delete it.
    - Additionally, you can also delete those items from the account page.
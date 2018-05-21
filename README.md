# GDPR-Agreement-Form
A php form that registers users that accepts some kind of Agreements in a database !

# Install
1) Execute the .sql to create the database
2) paste the index.php into /var/www/html
3) change the settings in the index.php
```
$servername = "";
$username = "";
$password = "";
$database = "gdrp_rifttime";
$redirect_url = ""; // url to be redirected after the agreement!

```

# Using it
Why? To make the user opt-in for some of your agreements, and to have a database with users that opted-in!
1) append "/?email=users_email_to_be_saved_in_db" to the url of the webserver. (ex: "www.agrement.com/?email=user@example.com")
2) Send this url by email, or redirect a user to this url.
3) If they accepted the terms, you will have a record with their email, their IP address and the date if the agreent in the database.

# Example Add-in for Outlook #

This is a simple [add-in for Outlook](https://msdn.microsoft.com/EN-US/library/office/fp161135.aspx) that allows you, to connect with an example data base with contact data and put the mail-address as your recipient. It's based on the starter project that Visual Studio 2013 creates when you select the **App for Office** project template.

## What you'll need ##

- A web server with an SSL certificate
- An Office 365 account

## Running the sample ##

1. Clone or fork the project from GitHub.
2. Copy the `app` directory from the project to your web server.
3. Open `manifest.xml` in a text editor and update all instances of `https://<your web server>` to the base URL of the directory on your web server where you deployed the `app` directory.
4. Open the index.php in the backend folder and edit the variables for the database connection on line 54. (if not changed you will see the MeertzWare example Database hosted by MeertzWare)
5. Open the home.html in the compose => home folder and change the iframe src parameter on line 21 and 46 to your backend/index.php location on your web-server. [https://<your web server>/Backend/index.php?S=] (if not changed you will see the MeertzWare example Database hosted by MeertzWare)
6. Logon to [Outlook Web Access](https://outlook.office365.com). Click on the gear cog in the upper right corner of the page and click on `Manage apps`.
7. On the `Manage apps` page, click on the '+' icon, select `Add from file`. Browse to the `manifest.xml` file included in the project.
8. Return to the Mail view in Outlook Web Access.
9. To try the functionality of the add-in, open any message and launch the `Example` app from the app bar.

PS: To set up your own Database, you find the Example-Database SQL-File in the directory "SQL".

## Copyright ##

Copyright (c) Microsoft. All rights reserved.
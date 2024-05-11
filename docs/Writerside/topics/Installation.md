# Installation

This guide provides an automated method
to install the necessary parts into your application using the composer packaged within this application.
The composer includes generators that aim to set up your applications optimally without overwriting any existing code.
It also copies components and their dependencies to your application.

## Prerequisites

Before you begin the installation process, ensure that you meet the following prerequisites:

- PHP version 8.2 or higher
- Symfony version 6.4 or higher

## Installation and Configuration Steps

Follow these steps to install and configure the application:

1. Create a new Symfony project using the Symfony CLI command `symfony new my-app`. Use the following command to specify the version of Symfony and PHP:

   ```bash
    symfony new my-app --version=6.4 --php=8.2 --webapp
   ```

2. Install the Fusion UI bundle with the following command:

   ```bash
       composer require dahromy/fusion-ui
   ```

3. Initialize Fusion UI to configure your app using the following command:

    ```bash
       php bin/console fusion-ui:init
    ```
This process will help you set up your application with the necessary components and dependencies.
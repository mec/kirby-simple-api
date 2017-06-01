# Kirby Simple API
An experiment in 'de-coupled' or 'headless' Kirby. The idea is to provide an API for content to consume with a frontend framework (React?) whilst using the Kirby backend and panel to add and update content.

## Installation
Copy the kirby-simple-api folder to your site > plugins folder

## Endpoints

- /api/menu – all visible top level pages
- /api/home - home page
- /api/%page% - page by slug
- /api/%page%/children - all children for a given page
- /api/%page%/%child% - child page by parent slug and child slug

## Advanced Branch
Built a more advanced version that is on the 'advanced' branch. This ones bundles up all the page, children and images in a single json file:

- /api/%page%

## Read more
https://medium.com/@mecrawlings/decoupled-kirby-d22416f567e9

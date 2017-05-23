# Kirby Krank

An experiment in 'de-coupled' or 'headless' Kirby. The idea is to provide an API for content to consume with a frontend framework (React?) whilst using the Kirby backend and panel to add and update content.

## Installation
Copy the kirby-simple-api folder to your site > plugins folder

## Endpoints

- /api/menu – all visible top level pages
- /api/home - home page
- /api/<page> - page by slug
- /api/<page>/children - all children for a given page
- /api/<page>/<child> - child page by parent slug and child slug

## Read the article

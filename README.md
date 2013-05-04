# Dog Tamer

A parser for the Virginia Dangerous Dogs Registry. Scrapes pages, saves a flat HTML file.

## Instructions

Create a blank file with permissions that will allow the web server to write to it.

```touch index.html;
chmod o+w index.html```

Then run `parser.php`, such as by loading it in a web browser.

`http://example.com/dogs/parser.php`

## To Do

* Add Google Map links to each address
* Display all registrants as points on a map
* Scrape the detailed information in the tabs at the target link

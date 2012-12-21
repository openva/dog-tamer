# Dog Tamer

A parser for the Virginia Dangerous Dogs Registry. Scrapes pages, saves a flat HTML file.

## Instructions

Create a blank file with permissions that will allow the web server to write to it.

```touch index.html;
chmod o+w index.html```

## To Do

* Store each record within an object, rather than storing HTML
* Eliminate useless "More Information" links
* Emit JSON, XML, and HTML
* Add Google Map links to each address
* Display all registrants as points on a map

# october-portfolio
This plugin allows you to show off your past projects. It also can be used for provides services, company values, etc.

The fields included for each showcase item are:

**Field**               | **Description**
------------------------|--------------------
Title                   | Name of the Item
Category                | Category of the Item
Description (Optional)  | Description of the Item with rich editor area
Images (Optional)       | Multiple images related to the item
URL (Optional)          | Project/Item URL

## Usage
Copy /plugins/arrizalamin/portfolio/components/portfolio/default.htm to your themes partials/portfolio folder. Here is the default template, you can format it any way you like.
~~~
<div class="container">
    {% for item in __SELF__.portfolio %}
        <div>
            {% set image = item.images.first %}
            <a href="{{ item.url }}">
                <img src="{{ image.path }}" class="img-responsive" alt="{{ image.title }}">
            </a>
        </div>
        <h2 class="text-center">{{ item.title }}</h2>
        <div class="text-center">
            {{ item.description|raw }}
        </div>
    {% endfor %}
</div>
~~~
Now you can embed portfolio in your pages. Just use the portfolio component in your page, select category of your portfolio and place `{% component 'portfolio' %}` anywhere you like.

Simple use case:
~~~
[portfolio]
category = "2"
==
<div class="container">
    {% component 'portfolio' %}
</div>
~~~

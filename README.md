# october-portfolio
This plugin allows you to show off your past projects. It also can be used for provides services, company values, etc.

The fields included for each showcase item are:

**Field**               | **Description**
------------------------|--------------------
Title                   | Name of the Item
Category                | Category of the Item
URL (Optional)          | Project/Item URL
Tags (Optional)         | Tags for the Item
Description (Optional)  | Description of the Item with rich editor area
Images (Optional)       | Multiple images related to the item

## Usage
### Copy the template
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
        {% for tag in item.tags %}
            <span class="label label-default">{{ tag.name }}</span>
        {% endfor %}
    </div>
    <div class="text-center">
        {{ item.description|raw }}
    </div>
    {% endfor %}

    {% if __SELF__.portfolio.lastPage > 1 %}
    <ul class="pagination">
        {% if __SELF__.portfolio.currentPage > 1 %}
        <li><a href="{{ this.page.baseFileName|page({ page: (__SELF__.portfolio.currentPage - 1) }) }}">&larr; Prev</a></li>
        {% endif %}

        {% for page in 1..__SELF__.portfolio.lastPage %}
        <li class="{{ __SELF__.portfolio.currentPage == page ? 'active' : null }}">
            <a href="{{ this.page.baseFileName|page({ page: page }) }}">{{ page }}</a>
        </li>
        {% endfor %}

        {% if __SELF__.portfolio.lastPage > __SELF__.portfolio.currentPage %}
        <li><a href="{{ this.page.baseFileName|page({ page: (__SELF__.portfolio.currentPage + 1) }) }}">Next &rarr;</a></li>
        {% endif %}
    </ul>
    {% endif %}
</div>
~~~

### Portfolio component
Now you can embed portfolio in your pages. Just use the portfolio component in your page, select category of your portfolio and place `{% component 'portfolio' %}` anywhere you like.

Simple use case:
~~~
title = "Portfolio"
url = "/portfolio/:page?"

[portfolio]
category = "0"
itemsPerPage = "5"
pageNumber = {{ :page }}
==
{% component 'portfolio' %}
~~~

### Tags
The default usage of tags is implemented as static tags. The tags are displayed with the item but are not clickable.
The tags can made clickable to have a more dynamic portfolio. Now tags can be clicked and a page with all items with the tag are displayed.

This can be achieved by adding the a-tag to each tag. See this example:
~~~
{% for tag in item.tags %}
    <a href="\portfolio\tags\{{ tag.name}}"><span class="label label-default">{{ tag.name }}</span></a>
{% endfor %}
~~~

An extra page should be created to have a landing page for the link.
In the CMS the following page needs to be created to get this working:
~~~
title = "Items by tag"
url = "/portfolio/:selected_tag/:page?"

[portfolio]
category = "0"
itemsPerPage = "5"
selectedTag = {{ :selected_tag }}
pageNumber = {{ :page }}
==
{% component 'portfolio' %}
~~~

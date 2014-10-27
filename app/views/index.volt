{% if isAjax == false %}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('styles/main.css') }}
        {{ stylesheet_link('styles/header.css') }}
        {{ stylesheet_link('styles/ppt-icon.css') }}
        {{ stylesheet_link('styles/index.css') }}
        {{ stylesheet_link('styles/register.css') }}
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('scripts/jquery-1.11.1.min.js') }}
        {{ javascript_include('scripts/index.js') }}
    </body>
</html>
{% else %}
{{ content() }}
{% endif %}
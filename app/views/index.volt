{% if isAjax == false %}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('styles/main.css') }}
        {{ stylesheet_link('styles/glass.css') }}
        {{ stylesheet_link('styles/header.css') }}
        {{ stylesheet_link('styles/ppt-icon.css') }}
        {{ stylesheet_link('styles/index.css') }}
        {{ stylesheet_link('styles/register.css') }}
        {{ stylesheet_link('styles/user.css') }}
        {{ stylesheet_link('styles/admin.css') }}
        {{ stylesheet_link('styles/ask.css') }}
        {{ javascript_include('scripts/jquery-1.11.1.min.js') }}
        {{ javascript_include('scripts/global.js') }}
        {{ javascript_include('scripts/glass.js') }}
    </head>
    <body>
        <div class="glassDiv">
            
        </div>
        <div class="smokeDiv">
        </div>
        {{ content() }}
    </body>
</html>
{% else %}
{{ content() }}
{% endif %}
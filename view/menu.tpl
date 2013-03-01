<!-- Navbar
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <a class="brand" href="/">MiPhoto</a>
        <div class="nav-collapse collapse">
            {strip}
            {if !empty($breadcrumbs)}
            <ul class="nav">
                {foreach from=$breadcrumbs item=item name=l}
                    <li class="slash">/</li>
                    <li class="">
                        {if $smarty.foreach.l.last}
                            <a>{$item->name}</a>
                        {else}
                            <a href="/{$item->url}">{$item->name}</a>
                        {/if}
                    </li>
                {/foreach}
            </ul>
            {/if}
            {/strip}
        </div>
    </div>
</div>
<!-- Navbar
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <a class="brand" href="">Photo</a>
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
                            <a href="{$item->url}">{$item->name}</a>
                        {/if}
                    </li>
                {/foreach}
            </ul>
            {/if}
            {/strip}
        </div>
        <div class="pull-right">
            {if $Auth}
                <a class="btn btn-inverse" href="/logout">
                    <i class="icon-off icon-white"></i>
                    Logout
                </a>
            {else}
                <a class="btn btn-inverse" href="/login">
                    <i class="icon-user icon-white"></i>
                    Login
                </a>
            {/if}
        </div>
    </div>
</div>
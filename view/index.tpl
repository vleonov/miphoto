{extends file="layout.tpl"}

{block "content"}

{if $albums->length}
    <legend>Альбомы</legend>
    <div class="b-albums">
        {foreach $albums as $album}
            <div class="b-album">
                <a class="e-thumb" href="/{$album->url}" style="background-image: url('/bulks/{$album->id}.jpg')" alt="">
                    <div class="e-name"><span>{$album->name}</span></div>
                </a>
            </div>
        {/foreach}
    </div>
    <div class="clearfix"></div>
{/if}

{if $photos->length}
    <form action="/photo/save" id="f-photos" method="post">

    <div class="b-photos">
        {foreach $photos as $i=>$photo}
            {if $photo@first}
                <legend>
                    {if $photo->rate > 50}
                        {assign var=isBest value=true}
                        Лучшие фотографии
                    {else}
                        Фотографии
                    {/if}
                </legend>
            {elseif $isBest && $photo->rate<=50}
                <div class="clearfix"></div>
                <legend>Остальные фотографии</legend>
                {assign var=isBest value=false}
            {/if}
            <div class="{if $i>40}a-lazyload{/if} b-photo">
                <a class="c-gallery" name="gallery{$i}" href="/photos/{$prefix}/{$photo->name}" target="_blank" data-preview="/prevws/{$prefix}/{$photo->name}" data-i="{$i}">
                    <img {if $i>20}data-src="/thumbs/{$prefix}/{$photo->name}"{else}src="/thumbs/{$prefix}/{$photo->name}"{/if}/>
                </a>
                <div class="b-controls c-photo">
                    <div class="c-check">
                        <i class="icon-ok"></i>
                        <input type="hidden" name="ids[{$photo->id}]" class="e-check" value="0" autocomplete="off"/>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>

    <div class="b-controls c-photos">
        <div title="Выбрать" data-toggle="dropdown" >
            <i class="icon-check icon-white"></i>
            <span class="caret"></span>
        </div>
        <ul class="dropdown-menu">
            <li><a class="c-bulk-check v-all" data-check=".c-photo">Все</a></li>
            <li><a class="c-bulk-check v-zero" data-check=".c-photo">Ни одной</a></li>
        </ul>
        <div class="c-star" title="Хорошая фотография">
            <i class="icon-star icon-white"></i>
        </div>
        <div class="c-unstar" title="Снять отметку хорошей">
            <i class="icon-star"></i>
        </div>
        <div class="c-remove" title="Удалить фотографию">
            <i class="icon-trash icon-white"></i>
        </div>
    </div>

    <div class="modal hide">
        <div class="c-gallery-prev">
            <div>
                <i class="icon-arrow-left icon-white"></i>
            </div>
        </div>
        <a target="_blank"><img src=""></a>
        <div class="c-gallery-next">
            <div>
                <i class="icon-arrow-right icon-white"></i>
            </div>
        </div>
        <div class="c-gallery-close">
            <div>
                <i class="icon-remove icon-white"></i>
            </div>
        </div>
    </div>

    </form>
{/if}

{/block}
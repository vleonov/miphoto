{extends file="layout.tpl"}

{block "content"}

{if $albums->length}
    <legend>Альбомы</legend>
    <div class="albums">
        {foreach $albums as $album}
            <div class="album">
                <a class="thumb" href="/{$album->url}" style="background-image: url('/bulks/{$album->id}.jpg')" alt="">
                    <div class="name"><span>{$album->name}</span></div>
                </a>
            </div>
        {/foreach}
    </div>
    <div class="clearfix"></div>
{/if}

{if $photos->length}
    <legend>Фотографии</legend>
    <div class="photos">
        {foreach $photos as $i=>$photo}
            <div class="{if $i>20}a-lazyload{/if} photo">
                <a name="gallery{$i}" href="/photos/{$prefix}/{$photo->name}" target="_blank" data-preview="/prevws/{$prefix}/{$photo->name}" data-i="{$i}">
                    <img {if $i>20}data-src="/thumbs/{$prefix}/{$photo->name}"{else}src="/thumbs/{$prefix}/{$photo->name}"{/if}/>
                </a>
            </div>
        {/foreach}
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
{/if}

{/block}
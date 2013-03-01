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
        {foreach $photos as $photo}
            <div class="photo">
                <a href="/photos/{$prefix}/{$photo->name}" target="_blank" data-preview="/prevws/{$prefix}/{$photo->name}">
                    <img src="/thumbs/{$prefix}/{$photo->name}"/>
                </a>
            </div>
        {/foreach}
    </div>

    <div class="modal hide">
        <a target="_blank"><img></a>
    </div>
{/if}

{/block}
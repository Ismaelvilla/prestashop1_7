
<div class="block-contact">
    <h4>{l s='Contact us' d='Shop.Theme.Global'}</h4>
    {$contact_infos.address.formatted nofilter}

    {if $contact_infos.email}
        <br>
        {l
            s='Email: [1]%email%[/1]'
            sprintf=[
                '%email%' => $contact_infos.email,
                '[1]' => '<a href="">',
                '[/1]' =>'</a>'
            ]
        }

    {/if}
</div>
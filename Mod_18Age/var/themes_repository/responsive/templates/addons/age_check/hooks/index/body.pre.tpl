{if $age_key == 'Hi'}
    {include file="addons/age_check/views/hi_check_birthday.tpl"}
{elseif $age_key == 'N'}
    {include file="addons/age_check/views/no_check_birthday.tpl"}
{elseif $age_key == 'Y'}
    {include file="addons/age_check/views/yes_check_birthday.tpl"}
{/if}

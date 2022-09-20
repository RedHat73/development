<div class="my_modal">
    <div class="my_modal-dialog">
        <div class="my_modal-content">
            <div class="my_modal-header">
                <h3 class="my_modal-title">{__("age_check")}</h3>
            </div>
            <div class="my_modal-body">
                <p class="my_modal-font">{__("age_check_content")}</p>
                <form name="my_form_age_check" action="{""|fn_url}" method="post" class="my_modal-body">
                    <div class="ty-control-group my_modal-body">
                        <label class="ty-control-group__title" for="birthday">{__("birthday")}</label>
                        {include file="common/calendar.tpl" 
                            date_id="birthday" 
                            date_name="guest_data[birthday]" 
                            date_val=$guest_data.birthday|default:$smarty.const.TIME
                            is_changeable_range=false
                        }
                    </div>
                    <div>
                        <div class="ty-float-right">
                            {include file="buttons/button.tpl" but_name="dispatch[init.birthday]" but_text=__("submit") but_role="submit" but_meta="ty-btn__secondary ty-btn__big cm-form-dialog-closer ty-btn"}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
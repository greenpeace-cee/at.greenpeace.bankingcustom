setTimeout(() => {
    cj("a.rules-analyser__show-ui-btn").on("click", () => {
        const customConditions = cj("select.rules-analyser__custom-name");

        if (customConditions.length > 0) return;

        const addConditionBtn = cj("a.rules-analyser__add-condition");

        addConditionBtn.click();
        cj("select[name=rules-analyser__custom-name-1]").val("assignment").change();

        addConditionBtn.click();
        cj("select[name=rules-analyser__custom-name-2]").val("end_to_end_id").change();
    });
}, 100);

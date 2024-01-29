function udcSlider(element) {
    const values = parseInt(element.value);
    const max_value = parseInt(element.getAttribute("max"));
    const min_value = parseInt(element.getAttribute("min"));

    const fullValue = Math.round((values - min_value) / (max_value - min_value) * 100);

    element.parentElement.parentElement.querySelector(".value_display").textContent = values;
    element.parentElement.parentElement.querySelector('.handle').style.left = `calc(${fullValue}% - 17px)`;
    element.parentElement.parentElement.querySelector('.udc_container .fill').style.width = fullValue + '%';

    // Update suvae value
    const min_sua = Math.floor((6.5/100) * values);
    const max_sua = Math.floor((8/100) * values);

    const min_sua_out = Math.floor((0.5/100) * values);
    const max_sua_out = Math.floor((2/100) * values);

    element.parentElement.parentElement.parentElement.querySelector('.card_with_suvae .range').textContent = min_sua + '-' + max_sua;
    element.parentElement.parentElement.parentElement.querySelector('.card_without_suvae .range').textContent = min_sua_out + '-' + max_sua_out;
}

const rangeInputsUdc = document.querySelectorAll(".custom_slider input");
rangeInputsUdc.forEach(input => {
    udcSlider(input);
    input.addEventListener("input", function() {
        udcSlider(this);
    });
});
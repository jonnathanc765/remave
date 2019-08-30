$(document).ready(function () {
    //Agregar mas campos para agregar mas detalles
    $(function () {
        $('#btnAdd').click(function () {
            var num = Number($('.cloneForm').last().attr('id').substr(8)), // how many "duplicatable" input fields we currently have

                newNum = new Number(num + 1), // the numeric ID of the new input field being added

                newElem = $('#detalles' + num).clone(true).attr('id', 'detalles' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
            // manipulate the name/id values of the input inside the new element
            // H2 - section

            newElem.find('.heading-reference').html('Producto #' + newNum);
            // Color - input
            newElem.find('.label_color').attr('for', 'ID_' + newNum + '_color')
            newElem.find('.input_color').attr('id', 'ID_' + newNum + '_color').attr('required', 'required').attr('name', 'ID_' + newNum + '_color').val('');

            // Tamaño - input
            newElem.find('.label_size').attr('for', 'ID_' + newNum + '_size');
            newElem.find('.input_size').attr('id', 'ID_' + newNum + '_size').attr('required', 'required').attr('name', 'ID_' + newNum + '_size').val('');

            newElem.find('.select_size_type').attr('id', 'ID_' + newNum + '_size_type').attr('required', 'required').attr('name', 'ID_' + newNum + '_size_type').val('type');

            // Precio - input
            newElem.find('.label_price').attr('for', 'ID_' + newNum + '_price');
            newElem.find('.input_price').attr('id', 'ID_' + newNum + '_price').attr('required', 'required').attr('name', 'ID_' + newNum + '_price').val('');

            // Cantidad - input
            newElem.find('.label_quantity').attr('for', 'ID_' + newNum + '_quantity');
            newElem.find('.input_quantity').attr('id', 'ID_' + newNum + '_quantity').attr('required', 'required').attr('name', 'ID_' + newNum + '_quantity').val('');

            // Foto - input
            newElem.find('.label_photo').attr('for', 'ID_' + newNum + '_photo');
            newElem.find('.input_photo').attr('id', 'ID_' + newNum + '_photo').attr('required', 'required').attr('name', 'ID_' + newNum + '_photo[]').attr('multiple', 'multiple').val('');

            // insert the new element after the last "duplicatable" input field
            $('#detalles' + num).after(newElem);
            $('#ID' + newNum + '_title').focus();

            // enable the "remove" button
            $('#btnRemove').attr('disabled', false);
            $('.rowDelBtn').attr('disabled', false);
            // right now you can only add 5 sections. change '5' below to the max number of times the form can be duplicated
            var max = 5;
            if (newNum == max)
                $('#btnAdd').attr('disabled', true).prop('value', "Alcansaste el limite");
            console.log(num);
            setValue("numDetails", num + 1);
        });

        function setValue(id, newvalue) {
            var s = document.getElementById(id);
            s.value = newvalue;
        }
        $('#btnRemove').click(function () {
            // confirmation
            if (confirm("¿Estas seguro de que quieres eliminar a este producto?")) {
                var num = $('.cloneForm').length;
                setValue("numDetails", num - 1)
                // how many "duplicatable" input fields we currently have
                $('#detalles' + num).slideUp('slow', function () {
                    $(this).remove();

                    // if only one element remains, disable the "remove" button
                    if (num - 1 === 1)
                        $('#btnRemove').attr('disabled', true);
                    // enable the "add" button
                    $('#btnAdd').attr('disabled', false).prop('value', "Agregar Detalle");
                });
            }
            return false;
            // remove the last element

            // enable the "add" button
            $('#btnAdd').attr('disabled', false);
            $('.rowDelBtn').attr('disabled', false);
        });

        $('#btnRemove').attr('disabled', true);
        $('.rowDelBtn').attr('disabled', true);

        $('.rowDelBtn').click(function () {
            if (confirm("Are you sure you wish to remove this section? This cannot be undone.")) {
                $(this).parent('div.cloneForm').remove();

            }
            return false;
        });

    });
    // bsCustomFileInput.init()
});


//Terminar el Crear de productos

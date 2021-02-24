jQuery(document).ready(function() {
    var $tagsCollectionHolder = $('ul.rows');

    $tagsCollectionHolder.data('index', $tagsCollectionHolder.find('input').length);

    $('body').on('click', '#add-row', function(e) {
        var $collectionHolderCLass = $(e.currentTarget).data('collectionHolderClass');
        addFormToCollection($collectionHolderCLass);
    })
});

function addFormToCollection($collectionHolderClass) {
    var $collectionHolder = $('.' + $collectionHolderClass);
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype;

    newForm = newForm.replace(/__name__/g, index);
    $collectionHolder.data('index', index + 1);

    var $newTr = $('<tr></tr>').append(newForm);
    $collectionHolder.append($newTr)
}

import './form-builder.min';
import './form-render.min';

// get data json from database
let data =  $("#form_builder").val();
let getData = [];
let formData;

//convert json data
if (data && data !== "")
{
    formData = JSON.parse(data);
}

var $formPages = $('#form-builder-pages'),
$newPage = $('#new-page'),
$newPageLink = $('#add-page-tab'),
formbuilderEditor = [],
dataLength = 0,
countFB = 1;

if(typeof formData !== "undefined") {
    dataLength = formData.length
}

var fields =
[
    {
        label: 'Video url',
        attrs: {
            type: 'text'
        },
        className : 'video form-control',
        icon: '😍'
    },
    {
        label: 'fileUpload',
        attrs: {
            type : 'file',
        },
        className : 'file form-control',
    }
];

var options = {
    replaceFields: [
        {
            type: "checkbox-group",
            label: "Checkbox",
            values: [{ label: "Option 1", value: "option-1" }],
            icon: "☑"
        }
    ],
    onSave: function () {
        $('.fb-editor').each( (index, e) => {
            let getDataButton = $(e).find('.get-data');
            getDataButton.click();
            let formDataJson = $('.formData-json');
            getData.push(formDataJson[0].firstChild.nodeValue);
            $('.form-builder-overlay').click();
        });
        $('#form_builder').val(JSON.stringify(getData));
        $formPages.submit();
    },
    actionButtons: [
        {
            id: 'preview',
            className: 'btn',
            label: 'Preview',
            type: 'button',
            events: {
                click: function() {
                    $('.fb-editor').each( (index, e) => {
                        let getDataButton = $(e).find('.get-data');
                        getDataButton.click();
                        let formDataJson = $('.formData-json');
                        getData.push(formDataJson[0].firstChild.nodeValue);
                        $('.form-builder-overlay').click();
                    });
                    $('#preview').val(JSON.stringify(getData));
                    $('#formPreview').submit()
                }
            }
        },
    ],
};

//create page
"use strict";
var $fbPages = $("#form-builder-pages");
var addPageTab = $("#add-page-tab");
var fbInstances = [];

$fbPages.tabs({
beforeActivate: function(event, ui) {
    if (ui.newPanel.selector === "#new-page") {
        return false;
    }
}
});

addPageTab.on(
"click",
() => {
    var tabCount = $("#tabs").children.length,
        tabId = "page-" + tabCount.toString(),
        $newPageTemplate = $("#new-page"),
        $newPage = $newPageTemplate
            .clone()
            .attr("id", tabId)
            .addClass("fb-editor"),
        $newTab = $(this)
            .clone()
            .removeAttr("id"),
        $tabLink = $("a", $newTab)
            .attr("href", "#" + tabId)
            .text("Page " + tabCount);
    $newPage.insertBefore($newPageTemplate);
    $newTab.insertBefore(this);
    $fbPages.tabs("refresh");
    $fbPages.tabs("option", "active", tabCount - 1);
    fbInstances.push($newPage.formBuilder(options));
},
false
);

//Insert data to form for edit
if(dataLength > 0)
{
    let makeCopy = {
        id: 'make_copy',
        className: 'btn btn-success',
        label: 'Make copy',
        type: 'button',
        events: {
            click: function () {
                $formPages.append('<input name="make_copy" type="hidden" value="make_copy">');
                $formPages.submit();
            }
        }
    };
    options.actionButtons.push(makeCopy);

    for(let i = 1; i <= dataLength; i++) {
        $formPages.tabs('refresh');
        $(`#page-${i}`).formBuilder(options).promise.then(function(fb) {
            fb.actions.setData(formData[i - 1]);
            // formbuilderEditor[i] = fb;
        });
        if(i === dataLength)
        {
            break;
        }
        $newPageLink.before(`<li><a class="nav-link" href="#page-${i+1}" data-toggle="tab" >Page ${i+1}</a></li>`);
        $newPage.before(`<div id="page-${i+1}" class="fb-editor"></div>`);
        countFB++;
    }
} else {
    formbuilderEditor.push($(`#page-1`).formBuilder(options));
}

//Add new tab edit
$newPageLink.click(function () {
    countFB++;
    $newPageLink.before(`<li><a class="nav-link" href="#page-${countFB}" data-toggle="tab" >Page ${countFB}</a></li>`);
    $newPage.before(`<div id="page-${countFB}" class="fb-editor"></div>`)
    $formPages.tabs('refresh');
    var x = countFB - 1;
    $formPages.tabs('option', 'active', x);
    formbuilderEditor.push($(`#page-${countFB}`).formBuilder(options));
});
$formPages.tabs({
    beforeActivate: function (event, ui) {
        if (ui.newPanel.selector === "#new-page") {
            return false;
        }
    }
});


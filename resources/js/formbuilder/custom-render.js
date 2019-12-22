//Render form Survey
var renderedForm = $('.render-wrap');
if (renderedForm.length > 0) {
    let getFormRendered = [];
    if (renderedForm.length > 0) {
        let jsonData;
        let render = $('#data-render');
        let formRenderOpts = {
            dataType: 'json',
        };
        if (render && render !== 'undefined') {
            jsonData = JSON.parse(render.val());
        }
        jsonData.forEach( (e, index) => {
            let className = 'tab-pane fade';
            let idName = index+1;
            let classActiveTab = '';
            let active = '';
            if(index === 0) {
                classActiveTab = ' in active';
                active = 'active';
            }
            formRenderOpts.formData = e;
            renderedForm.find('ul').append(
                '<li><a class="'+active+'" data-toggle="tab" href="#page_'+idName+'">'+"Page "+idName+'</a></li>'
            );
            renderedForm.find('.tab-content').append(
                '<div class="'+className+classActiveTab+'" id="page_'+idName+'"></div>'
            );
            getFormRendered.push($('#page_'+idName).formRender(formRenderOpts));
            formRenderOpts.formData = [];

        });
    }

    $('#submit').click( (e) => {
        let getData = [];
        getFormRendered.forEach( (e,index) => {
            console.log(e);
            getData[index] = e.userData;
        });
        $('#answer').val(JSON.stringify(getData));
    });
}

//Render answer
AnserPage = $('.view-answers');
if (AnserPage.length > 0) {
    let fbOptions = {
        dataType: 'json',
    };
    let renderAnswer = $('.render-answer');
    let answer = $('input[name="data-answer"]').val();

    if (answer.length > 0) {
        JSON.parse(answer).forEach( (e, index) => {
            let className = 'tab-pane fade';
            let idName = index+1;
            let classActiveTab = '';
            let active = '';
            fbOptions.formData = e;
            if(index === 0) {
                classActiveTab = ' in active';
                active = 'active';
            }
            renderAnswer.find('ul').append(
                '<li><a class="'+active+'" data-toggle="tab" href="#page_'+idName+'">'+"Page "+idName+'</a></li>'
            );
            renderAnswer.find('.tab-content').append(
                '<div class="'+className+classActiveTab+'" id="page_'+idName+'"></div>'
            );
            $('#page_'+idName).formRender(fbOptions);
            fbOptions.formData = [];
        });
    }
}

CKEDITOR.on('dialogDefinition', function(e)
{
    dialogName = e.data.name;
    dialogDefinition = e.data.definition;
    console.log(dialogDefinition);
    if(dialogName == 'image'){
        dialogDefinition.removeContents('Link');
        dialogDefinition.removeContents('advanced');
        dialogDefinition.removeContents('Upload');
        var tabContent = dialogDefinition.getContents('info');
        tabContent.remove('txtHSpace');
        tabContent.remove('txtVSpace');
       
        tabContent.remove('txtHeight');
         tabContent.remove('txtWidth');
        tabContent.remove('txtBorder');
        tabContent.remove('txtAlign');
       
        
    }
})


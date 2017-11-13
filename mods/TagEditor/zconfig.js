$('#demo3').tagEditor({ 
	initialTags: ['Pudge', 'Tiny'], 
	placeholder: 'Enter tags ...' 
	});
$('#remove_all_tags').click(function() {
	var tags = $('#demo3').tagEditor('getTags')[0].tags;
	for (i=0;i<tags.length;i++){ $('#demo3').tagEditor('removeTag', tags[i]); }
});  
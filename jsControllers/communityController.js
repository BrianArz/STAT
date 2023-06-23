function phpController(operation, idExam, idCommunity)
{
    $.ajax({
        url: '../controllers/communityController.php',
        type: 'POST',
        data: {operation: operation, idExam: idExam, idCommunity: idCommunity},
        success: function(response) {
            location.reload();
        },
        error: function(xhr, status, error) {
            
        }
    });
}
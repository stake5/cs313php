function validateForm() {
	var q1 = document.forms["survey"]["q1"].value;
	var q2 = document.forms["survey"]["q2"].value;
	var q3 = document.forms["survey"]["q3"].value;
	var q4 = document.forms["survey"]["q4"].value;

	if (q1 == null || q1 == "") {
        alert("The first question must be answered!");
        return false;
    } 
    if (q2 == null || q2 == "") {
    	alert("The second question must be answered!");
        return false;
    } 
    if (q3 == null || q3 == "") {
    	alert("The third question must be answered!");
        return false;
    } 
    if (q4 == null || q4 == "") {
    	alert("The last question must be answered!");
        return false;
    }
}
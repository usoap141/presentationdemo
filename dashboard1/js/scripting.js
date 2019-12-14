function calculateBmi() {
var weight = Number(document.bmiForm.weight.value)
var height = Number(document.bmiForm.height.value)


if(weight > 0 && height > 0){	

var bmi = Number(weight/(height/100*height/100));

if(bmi < 18.5){
document.getElementById('result').value ="Your BMI is "+bmi.toFixed(2)+". You are Underweight"
} else if(bmi > 18.5 && bmi < 25){
document.getElementById('result').value = "Your BMI is "+bmi.toFixed(2)+". You are Healthy"
}else if(bmi > 25){
document.getElementById('result').value = "Your BMI is "+bmi.toFixed(2)+". You are Overweight"
}
}
}

var deep_thought = { 
    the_answer: 42, 
    ask_question: function () { 
        console.log( this.the_answer); 
        this.the_answer++;
        return this.the_answer; 
    } 
}; 
var the_meaning  = deep_thought.ask_question();
var the_meaning2 = deep_thought.ask_question();
var the_meaning3 = deep_thought.ask_question();

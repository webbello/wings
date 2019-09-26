export class QuizConfig {
    allowBack;
    allowReview;
    autoMove;  // if boolean; it will move to next question automatically when answered.
    duration;  // indicates the time in which quiz needs to be completed. 0 means unlimited.
    autoSubmit; // it will submit quiz automatically when duration is complete.
    pageSize;
    requiredAll;  // indicates if you must answer all the questions before submitting.
    richText;
    shuffleQuestions;
    shuffleOptions;
    showClock;
    showPager;
    theme;

    constructor(data) {
        data = data || {};
        this.allowBack = data.allowBack;
        this.allowReview = data.allowReview;
        this.autoMove = data.autoMove;
        this.duration = data.duration;
        this.autoSubmit = data.autoSubmit;
        this.pageSize = data.pageSize;
        this.requiredAll = data.requiredAll;
        this.richText = data.richText;
        this.shuffleQuestions = data.shuffleQuestions;
        this.shuffleOptions = data.shuffleOptions;
        this.showClock = data.showClock;
        this.showPager = data.showPager;
    }
}

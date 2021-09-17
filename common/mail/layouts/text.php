<style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap");

    *,
    button,
    input {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: "Roboto", sans-serif;
    }

    :root {
        --bg-shape-color: linear-gradient(120deg, #343a4f, #0f1620);
        --lightblue: #3d9dea;
        --darkblue: #4a4eee;
        --text-color: #d5e1ef;
    }

    html,
    body {
        width: 100%;
        min-height: 100vh;
        background-image: linear-gradient(90deg, #414850, #131720);
        color: var(--text-color);
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0px;
    }

    .wrapper {
        width: 350px;
        border-radius: 40px;
        background-image: var(--bg-shape-color);
        overflow: hidden;
    }

    .overviewInfo,
    .productSpecifications {
        padding: 24px;
    }

    .overviewInfo {
        background-image: linear-gradient(176deg,
                var(--lightblue),
                var(--darkblue));
    }

    .actions {
        display: flex;
        justify-content: space-between;
        margin-bottom: 32px;
    }

    .actions .cartbutton {
        position: relative;
    }

    .actions .cartbutton::after {
        content: "";
        display: block;
        width: 8px;
        height: 8px;
        background-image: linear-gradient(90deg, #489be2, #0f629c);
        border-radius: 50%;
        position: absolute;
        top: 11px;
        right: 8px;
    }

    .actions .cartbutton svg {
        color: #ababab73;
    }

    .actions .backbutton,
    .actions .cartbutton {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .neurobutton {
        background-image: var(--bg-shape-color);
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: inset 3px 4px 5px 0px rgba(197, 197, 197, 0.1),
            inset 3px 6px 6px 5px rgba(78, 77, 77, 0.1),
            -2px -2px 8px 2px rgba(255, 255, 255, 0.1),
            2px 2px 6px 3px rgba(0, 0, 0, 0.4);
    }

    .productinfo {
        margin-top: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        min-height: 200px;
        margin-bottom: 50px;
    }

    .productImage {
        position: absolute;
        width: 321px;
        height: auto;
        transform: rotate(-90deg) translate(-56px, 66px);
        transition: ease 2s all;
    }

    .productImage img {
        width: 100%;
        height: auto;
    }

    .productImage:hover {
        transition: ease 2s all;
        animation: none;
        transform: rotate(-70deg) translate(10px, 66px);
    }

    h1 {
        font-family: "Michroma", sans-serif;
    }

    .grouptext h3 {
        letter-spacing: 3.2px;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .grouptext p {
        font-size: 12px;
        opacity: 0.8;
    }

    /* product specifications */
    .featureIcon {
        width: 40px;
        height: 40px;
        background-image: var(--bg-shape-color);
        border-radius: 8px;
        margin-right: 16px;
    }

    .productSpecifications h1 {
        margin-top: 10px;
        margin-bottom: 16px;
        font-size: 32px;
    }

    .productSpecifications p {
        opacity: 0.8;
        font-size: 15px;
        line-height: 1.5;
    }

    .productSpecifications .productFeatures {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin-top: 20px;
        grid-row-gap: 16px;
    }

    .productSpecifications .productFeatures .feature {
        display: flex;
    }

    .checkoutButton {
        display: flex;
        width: 100%;
        background-image: var(--bg-shape-color);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: -2px -2px 2px 0px rgba(80, 80, 80, 0.1),
            2px 2px 3px 0px rgba(12, 12, 12, 0.3),
            inset 0px 0px 0px 2px rgba(80, 80, 80, 0.2);
        margin-top: 30px;
        padding: 14px;
        justify-content: space-between;
        align-items: center;
    }

    .priceTag {
        display: flex;
        align-items: center;
        font-size: 32px;
    }

    .priceTag span {
        color: #488dc7;
        font-size: 20px;
    }

    /* checkout button*/
    button.preorder {
        outline: 0;
        border: 0;
        border-radius: 6px;
        display: flex;
        align-items: center;
        overflow: hidden;
        background-image: linear-gradient(85deg, #61c7ef, #4833fb);
        color: white;
    }

    .preorder p {
        padding: 8px 17px;
        border-right: 1px solid rgba(0, 0, 0, 0.4);
    }

    .buttonaction {
        border-left: 1px solid rgba(255, 255, 255, 0.2);
        padding: 5px 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.7);
    }

    /* animation */
    @keyframes updowncontroller {
        0% {
            transform: rotate(-90deg) translate(-56px, 66px);
        }

        80%,
        100% {
            transform: rotate(-70deg) translate(10px, 66px);
        }
    }
</style>

<div class="asd wrapper">
    <div class="asd overviewInfo">
        <div class="asd productinfo">
            <div class="asd grouptext">
                <h3>Fio:</h3>
                <p><?=$model->full_name?></p>
            </div>
            <div class="asd grouptext">
                <h3>Email:</h3>
                <p><?=$model->email?></p>
            </div>
            <div class="asd grouptext">
                <h3>Number</h3>
                <p><?=$model->number?></p>
            </div>

            <div class="asd productImage">
                <img src="https://i.imgur.com/ckSgzLQ.png" alt="product: ps5 controller image" />
            </div>
        </div>
    </div>
    <!-- overview info -->

    <div class="asd productSpecifications">
        <h1>Message</h1>
        <p>
            <?=$model->text?>
        </p>

    </div>
    <!-- product specificaiton -->
</div>
<!-- wrapper-->
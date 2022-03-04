<template>
  <div class="messaging" id="messaging">
    <div class="inbox_msg">
      <div class="mesgs">
        <div class="msg_history" id="msg_history">
          <div >
            <div class="incoming_msg" >
              <div class="received_msg">
                <div class="received_withd_msg float-left" style="max-width:75%;">
                  <p>message</p>
                  <span class="time_date"></span>
                </div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg float-right" style="max-width:75%;">
                <p>mess</p>

                <span class="time_date">21.00</span>
              </div>
            </div>
          </div>
        </div>

        <div class="type_msg">
          <div class="input_msg_write">
            <textarea
              name="content"
              id="sendReply"?.
              cols="30"
              rows="3"
              class="write_msg form-control"
              style="padding-right:40px;background:white"
              placeholder="メッセージを入力..."

            ></textarea>
            <div class="msg_send_btn">
              <i
                class="fa fa-paper-plane"
                aria-hidden="true"
                style="display: block;padding: 7px;"

              ></i>
            </div>
          </div>?.
        </div>
      </div>
    </div>
  </div>
</template>

<script>
</script>

<style scoped>
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%;
  border-right: 1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac {
  margin: 20px 0 0;
}
.recent_heading {
  float: left;
  width: 40%;
}
.headind_srch {
  padding: 10px 29px 10px 20px;
  overflow: hidden;
  border-bottom: 1px solid #c4c4c4;
}
.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}
.chat_ib h5 {
  font-size: 15px;
  color: #464646;
  margin: 0 0 8px 0;
}
.chat_ib h5 span {
  font-size: 13px;
  float: right;
}
.chat_ib p {
  font-size: 14px;
  color: #989898;
  margin: auto;
}
.chat_people {
  overflow: hidden;
  clear: both;
}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat {
  height: 550px;
  overflow-y: scroll;
}
.active_chat {
  background: #ebebeb;
}
.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
}
.received_withd_msg {
  width: 100%;
}
.received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.mesgs {
  float: left;
  width: 100%;
}
.sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0;
  color: #fff;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.outgoing_msg {
  overflow: hidden;
  margin: 26px 0 26px;
}
.sent_msg {
  float: right;
  width: 100%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}
.type_msg {
  border-top: 1px solid #c4c4c4;
  position: relative;
}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging {
  padding: 0 0 50px 0;
}
.msg_history {
  overflow-y: scroll;
  overflow: scroll;
  height: 600px;
}
</style>

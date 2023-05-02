import os
import requests
import subprocess
import time

# Replace with your Twitch API Client ID
client_id = "your_client_id"

# Replace with the Twitch channel name you want to record
channel_name = "your_channel_name"

# Replace with the path where you want to save the recorded video
output_path = "/home/stools/output.mp4"

# Replace with the FFmpeg command you want to use for recording
ffmpeg_command = "ffmpeg -i https://twitch.tv/{} -c copy -flags +global_header {}".format(channel_name, output_path)

while True:
    # Call the Twitch API to get the channel status
    response = requests.get("https://api.twitch.tv/helix/streams?user_login={}".format(channel_name), headers={"Client-ID": client_id})
    data = response.json()["data"]

    # If the channel is live, start recording
    if len(data) > 0:
        subprocess.Popen(ffmpeg_command.split())
        
        # Wait for the recording to finish before checking again
        while True:
            time.sleep(60)
            if not os.path.exists(output_path):
                break
    else:
        time.sleep(60)

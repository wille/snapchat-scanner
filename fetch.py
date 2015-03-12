import urllib.request

url = "http://localhost/snapchat-grabber"

def main():
    list = getlist("/fetch.php")
    for file in list:
        pass
    
def getlist(url):
    response = urllib.request.urlopen(url)
    data = response.read()
    files = data.split("\n")
    
    return files;
        

if __name__ == "__main__":
    main()
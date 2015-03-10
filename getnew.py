import urllib.request

def main():
    print("Running scanner")
    
def download(url, save):
    response = urllib.request.urlopen(url)
    data = response.read()
    
    if save:
        f = open("test.txt", "wb")
        f.write(data)
        f.close()
    else:
        return data.decode("utf-8")
        

if __name__ == "__main__":
    main()